import './bootstrap';
import Alpine from 'alpinejs';
import Editor from '@toast-ui/editor'
import '@toast-ui/editor/dist/toastui-editor.css';

window.Alpine = Alpine;

Alpine.start();


const editor = new Editor({
  el: document.querySelector('#editor'),
  height: '400px',
  initialEditType: 'markdown',
  placeholder: 'Write something cool!',
})


document.querySelector('#createPostForm').addEventListener('submit', e => {
    e.preventDefault();
    document.querySelector('#hiddenContent').value = editor.getMarkdown();
    e.target.submit();
});

document.querySelector('#contactForm').addEventListener('submit', e => {
    e.preventDefault();
    e.target.submit();
});