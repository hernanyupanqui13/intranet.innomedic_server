import {viewValidator, requestConfirmation, confirmViewedDocument} from './viewValidator.js';

let document_name = document.querySelector('.data_container').dataset.document_number;

viewValidator(document_name);