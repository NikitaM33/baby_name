import { getNames } from './randomName.js';
import { randomInt } from './randomName.js';

let anotherMaleName = document.querySelector('#anotherMaleName');
let randName = document.querySelector('.randName');

window.addEventListener('load', async function () {
  await getNames('Male');
});

let randomName = () => {
  if (localStorage.getItem('names')) {
    let maleNames = JSON.parse(localStorage.getItem('names'));
    let randomNum = randomInt(1, maleNames.length);

    randName.innerText = maleNames[randomNum].name;
  }
};

anotherMaleName.addEventListener('click', randomName);

