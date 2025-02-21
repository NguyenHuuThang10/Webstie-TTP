/**
 * @license Copyright (c) 2003-2022, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.extraAllowedContent = 'ul li ol';

    // Không tự động loại bỏ định dạng danh sách
    config.removeFormatTags = '';

    // Nếu CKEditor đang tự động lọc nội dung, tắt nó đi
    config.allowedContent = true;

    // Nếu cần giữ lại class và style (để tránh mất định dạng)
    config.extraAllowedContent = 'ul[*]{*}; ol[*]{*}; li[*]{*}';
};
