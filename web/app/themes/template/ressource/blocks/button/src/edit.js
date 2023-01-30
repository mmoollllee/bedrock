/**
 * External dependencies
 */
import classnames from 'classnames'

/**
 * WordPress dependencies
 */
import { __ } from '@wordpress/i18n'

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss'

import { useCallback, useState } from '@wordpress/element'
import {
   KeyboardShortcuts,
   PanelBody,
   RangeControl,
   TextControl,
   ToggleControl,
   ToolbarButton,
   ToolbarGroup,
   Popover,
} from '@wordpress/components'
import {
   BlockControls,
   InspectorControls,
   RichText,
   __experimentalLinkControl as LinkControl,
} from '@wordpress/block-editor'
import { rawShortcut, displayShortcut } from '@wordpress/keycodes'
import { link, linkOff } from '@wordpress/icons'
import { createBlock } from '@wordpress/blocks'

const NEW_TAB_REL = 'noreferrer noopener'
const MIN_BORDER_RADIUS_VALUE = 0
const MAX_BORDER_RADIUS_VALUE = 50
const INITIAL_BORDER_RADIUS_POSITION = 0

function BorderPanel({ borderRadius = '', setAttributes }) {
   const initialBorderRadius = borderRadius
   const setBorderRadius = useCallback(
      (newBorderRadius) => {
         if (newBorderRadius === undefined)
            setAttributes({
               borderRadius: initialBorderRadius,
            })
         else setAttributes({ borderRadius: newBorderRadius })
      },
      [setAttributes],
   )
   return (
      <PanelBody title={__('Border settings')} opened={false}>
         <RangeControl
            value={borderRadius}
            label={__('Border radius')}
            min={MIN_BORDER_RADIUS_VALUE}
            max={MAX_BORDER_RADIUS_VALUE}
            initialPosition={INITIAL_BORDER_RADIUS_POSITION}
            allowReset
            onChange={setBorderRadius}
         />
      </PanelBody>
   )
}

function URLPicker({
   isSelected,
   url,
   setAttributes,
   opensInNewTab,
   onToggleOpenInNewTab,
}) {
   const [isURLPickerOpen, setIsURLPickerOpen] = useState(false)
   const urlIsSet = !!url
   const urlIsSetandSelected = urlIsSet && isSelected
   const openLinkControl = () => {
      setIsURLPickerOpen(true)
      return false // prevents default behaviour for event
   }
   const unlinkButton = () => {
      setAttributes({
         url: undefined,
         linkTarget: undefined,
         rel: undefined,
      })
      setIsURLPickerOpen(false)
   }
   const linkControl = (isURLPickerOpen || urlIsSetandSelected) && (
      <Popover
         position="bottom center"
         onClose={() => setIsURLPickerOpen(false)}
      >
         <LinkControl
            className="wp-block-navigation-link__inline-link-input"
            value={{ url, opensInNewTab }}
            onChange={({
               url: newURL = '',
               opensInNewTab: newOpensInNewTab,
            }) => {
               setAttributes({ url: newURL })

               if (opensInNewTab !== newOpensInNewTab) {
                  onToggleOpenInNewTab(newOpensInNewTab)
               }
            }}
         />
      </Popover>
   )
   return (
      <>
         <BlockControls>
            <ToolbarGroup>
               {!urlIsSet && (
                  <ToolbarButton
                     name="link"
                     icon={link}
                     title={__('Link')}
                     shortcut={displayShortcut.primary('k')}
                     onClick={openLinkControl}
                  />
               )}
               {urlIsSetandSelected && (
                  <ToolbarButton
                     name="link"
                     icon={linkOff}
                     title={__('Unlink')}
                     shortcut={displayShortcut.primaryShift('k')}
                     onClick={unlinkButton}
                     isActive={true}
                  />
               )}
            </ToolbarGroup>
         </BlockControls>
         {isSelected && (
            <KeyboardShortcuts
               bindGlobal
               shortcuts={{
                  [rawShortcut.primary('k')]: openLinkControl,
                  [rawShortcut.primaryShift('k')]: unlinkButton,
               }}
            />
         )}
         {linkControl}
      </>
   )
}

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
 *
 * @param {Object} [props]           Properties passed from the editor.
 * @param {string} [props.className] Class name generated for the block.
 *
 * @return {WPElement} Element to render.
 */
export default function Edit(props) {
   const {
      attributes,
      setAttributes,
      className,
      isSelected,
      onReplace,
      mergeBlocks,
   } = props
   const {
      borderRadius,
      linkTarget,
      placeholder,
      rel,
      text,
      url,
      icon,
      iconRight,
      iconLeft,
   } = attributes
   const onSetLinkRel = useCallback(
      (value) => {
         setAttributes({ rel: value })
      },
      [setAttributes],
   )

   const onToggleOpenInNewTab = useCallback(
      (value) => {
         const newLinkTarget = value ? '_blank' : undefined

         let updatedRel = rel
         if (newLinkTarget && !rel) {
            updatedRel = NEW_TAB_REL
         } else if (!newLinkTarget && rel === NEW_TAB_REL) {
            updatedRel = undefined
         }

         setAttributes({
            linkTarget: newLinkTarget,
            rel: updatedRel,
         })
      },
      [rel, setAttributes],
   )

   return (
      <>
         <RichText
            placeholder={placeholder || __('Add text…')}
            value={text}
            onChange={(value) => setAttributes({ text: value })}
            withoutInteractiveFormatting
            className={classnames(className, 'wp-block-button__link', {
               'no-border-radius': borderRadius === 0,
            })}
            style={{
               borderRadius: borderRadius ? borderRadius + 'px' : undefined,
            }}
            onSplit={(value) =>
               createBlock('mmoollllee/button', {
                  ...attributes,
                  text: value,
               })
            }
            onReplace={onReplace}
            onMerge={mergeBlocks}
            identifier="text"
         />
         <URLPicker
            url={url}
            setAttributes={setAttributes}
            isSelected={isSelected}
            opensInNewTab={linkTarget === '_blank'}
            onToggleOpenInNewTab={onToggleOpenInNewTab}
         />
         <InspectorControls>
            <PanelBody title={__('Link settings')}>
               <TextControl
                  label={__('Icon davor')}
                  value={iconLeft || ''}
                  onChange={(value) => {
                     setAttributes({ iconLeft: value })
                  }}
               />
               <TextControl
                  label={__('Icon danach')}
                  value={iconRight || ''}
                  onChange={(value) => {
                     setAttributes({ iconRight: value })
                  }}
               />
               <TextControl
                  label={__('Icon darüber')}
                  value={icon || ''}
                  onChange={(value) => {
                     setAttributes({ icon: value })
                  }}
               />
               <ToggleControl
                  label={__('Open in new tab')}
                  onChange={onToggleOpenInNewTab}
                  checked={linkTarget === '_blank'}
               />
               <TextControl
                  label={__('Link rel')}
                  value={rel || ''}
                  onChange={onSetLinkRel}
               />
            </PanelBody>
            <BorderPanel
               borderRadius={borderRadius}
               setAttributes={setAttributes}
            />
         </InspectorControls>
      </>
   )
}
