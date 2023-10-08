/**
 * WordPress dependencies
 */
import {registerBlockType} from '@wordpress/blocks';
import {
    useBlockProps,
    AlignmentToolbar,
    BlockControls,
    ColorPalette,
    InspectorControls,
} from '@wordpress/block-editor';
import ServerSideRender from '@wordpress/server-side-render';

// Register the block
registerBlockType('adilrabid/hello-dolly-2-block', {
    attributes: {
        // alignment: {
        //     type: 'string',
        //     default: 'none',
        // },
        bg_color: {type: 'string', default: '#000000'},
        text_color: {type: 'string', default: '#ffffff'},
    },
    edit: ({attributes, setAttributes}) => {
        const blockProps = useBlockProps();

        // const onChangeAlignment = ( newAlignment ) => {
        //     setAttributes( {
        //         alignment: newAlignment === undefined ? 'none' : newAlignment,
        //     } );
        // };

        const onChangeTextColor = (hexColor) => {
            setAttributes({text_color: hexColor});
        };

        const onChangeBGColor = (hexColor) => {
            setAttributes({bg_color: hexColor});
        };

        return (
            <>
                <BlockControls>
                    {/*<AlignmentToolbar*/}
                    {/*    value={ attributes.alignment }*/}
                    {/*    onChange={ onChangeAlignment }*/}
                    {/*/>*/}
                </BlockControls>
                <InspectorControls key="setting">
                    <div id="gutenpride-controls">
                        <fieldset>
                            <legend className="blocks-base-control__label">
                                Text color
                            </legend>
                            <ColorPalette // Element Tag for Gutenberg standard colour selector
                                onChange={onChangeTextColor} // onChange event callback
                            />
                        </fieldset>
                        <fieldset>
                            <legend className="blocks-base-control__label">
                                Background color
                            </legend>
                            <ColorPalette // Element Tag for Gutenberg standard colour selector
                                onChange={onChangeBGColor} // onChange event callback
                            />
                        </fieldset>
                    </div>
                </InspectorControls>
                <ServerSideRender
                    block="adilrabid/hello-dolly-2-block"
                />
                {/*<p*/}
                {/*    {...blockProps}*/}
                {/*    style={{*/}
                {/*        backgroundColor: attributes.bg_color,*/}
                {/*        color: attributes.text_color,*/}
                {/*        padding: '16px 10px',*/}
                {/*        textAlign: 'center',*/}
                {/*    }}> Hello Dolly 2.0 </p>*/}
            </>
        );
    },
    // save: function ({attributes}) {
    //     const blockProps = useBlockProps.save();
    //     return <p
    //         {...blockProps}
    //         style={{
    //             backgroundColor: attributes.bg_color,
    //             color: attributes.text_color,
    //             padding: '16px 10px',
    //             textAlign: 'center',
    //         }}> Hello world (from the frontend)</p>;
    // },
});