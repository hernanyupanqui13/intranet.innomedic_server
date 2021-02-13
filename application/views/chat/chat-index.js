import ChatBoard from './ChatBoard.js';

// Variables
const main_html_element = document.querySelector(".chat-main-box");

// Creating an instance of the object
let chat_board = new ChatBoard(main_html_element);
console.log(chat_board);

// Rendering the chat board an its users 
chat_board.renderEverything();


