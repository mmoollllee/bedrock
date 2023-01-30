/**
 * Registers a new block provided a unique name and an object defining its behavior.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/#registering-a-block
 */
import { registerBlockType } from '@wordpress/blocks'

/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n'

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * All files containing `style` keyword are bundled together. The code used
 * gets applied both to the front of your site and to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './style.scss'

/**
 * Internal dependencies
 */
import Edit from './edit'
import save from './save'

/**
 * Every block starts by registering a new block type definition.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/#registering-a-block
 */
registerBlockType('mmoollllee/buttons', {
   /**
    * This is the display title for your block, which can be translated with `i18n` functions.
    * The block inserter will show this name.
    */
   title: __('Buttons', 'buttons'),

   /**
    * This is a short description for your block, can be translated with `i18n` functions.
    * It will be shown in the Block Tab in the Settings Sidebar.
    */
   description: __(
      'Example block written with ESNext standard and JSX support – build step required.',
      'buttons',
   ),

   /**
    * Blocks are grouped into categories to help users browse and discover them.
    * The categories provided by core are `common`, `embed`, `formatting`, `layout` and `widgets`.
    */
   category: 'layout',

   /**
    * An icon property should be specified to make it easier to identify a block.
    * These can be any of WordPress’ Dashicons, or a custom svg element.
    */
   icon: 'button',

   /**
    * Optional block extended support features.
    */
   supports: {
      anchor: false,
      align: true,
      alignWide: false,
   },
   keywords: [__('link')],
   example: {
      innerBlocks: [
         {
            name: 'mmoollllee/button',
            attributes: { text: __('Find out more') },
         },
         {
            name: 'mmoollllee/button',
            attributes: { text: __('Contact us') },
         },
      ],
   },
   edit: Edit,
   save,
})