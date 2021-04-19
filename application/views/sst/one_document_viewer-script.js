import {viewValidator, requestConfirmation, confirmViewedDocument} from './viewValidator.js';

let document_name = document.querySelector('.data_container').dataset.document_name;

const pdf_document = document.querySelector(".pdf_document");
pdf_document.title = document_name;

viewValidator(document_name);