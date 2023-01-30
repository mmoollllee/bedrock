/**
 * WordPress dependencies
 */
import { createBlock } from '@wordpress/blocks'

const transforms = {
   from: [
      {
         type: 'block',
         isMultiBlock: true,
         blocks: ['mmoollllee/button'],
         transform: (buttons) =>
            // Creates the buttons block
            createBlock(
               name,
               {},
               // Loop the selected buttons
               buttons.map((attributes) =>
                  // Create singular button in the buttons block
                  createBlock('mmoollllee/button', attributes),
               ),
            ),
      },
   ],
}

export default transforms
