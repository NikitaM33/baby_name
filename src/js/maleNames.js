import { getNames } from './randomName.js';

let anotherMaleName = document.querySelector('#anotherMaleName');
let randName = document.querySelector('.randName');

window.addEventListener('load', async function () {
  await getNames('Male');
});

let randomName = () => {
  if (localStorage.getItem('names')) {
    let maleNames = JSON.parse(localStorage.getItem('names'));
    let randomNum = Math.floor(Math.random() * maleNames.length) + 1;

    randName.innerText = maleNames[randomNum].name;
  }
};

anotherMaleName.addEventListener('click', randomName);

