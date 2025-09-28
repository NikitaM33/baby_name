import { getNames } from './randomName.js';
import { randomInt } from './randomName.js';

window.addEventListener('load', async function () {
  let anotherMaleName = document.querySelector('#anotherMaleName');
  let randName = document.querySelector('.random-name__name');
  let maleNames = '';

  await getNames('Male');

  if (localStorage.getItem('names')) {
    maleNames = JSON.parse(localStorage.getItem('names'));
  }

  let randomName = () => {
    let randomNum = randomInt(1, maleNames.length);

    randName.innerText = maleNames[randomNum].name;
  };

  anotherMaleName.addEventListener('click', randomName);
});
