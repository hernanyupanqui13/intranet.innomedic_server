import {viewValidator, requestConfirmation, confirmViewedDocument} from '../sst/viewValidator.js?v=3';

const data_container = document.querySelector('.data_container');
let document_name = data_container.dataset.document_name;
const user_data = JSON.parse(data_container.dataset.user_data);

const pdf_document = document.querySelector(".pdf_document");
pdf_document.title = document_name;

//viewValidator(document_name, user_data);