import { getNames } from './randomName.js';
import { randomInt } from './randomName.js';

window.addEventListener('load', async function () {
  let anotherMaleName = document.querySelector('#anotherMaleName');
  let randName = document.querySelector('.random-name__name');
  let originName = document.querySelector('.origin-name');
  let accordionItem = document.querySelector('.origin__accordion-item');
  let orirginTale = document.querySelector('.origin-tale');
  let chevron = document.querySelector('.origin-name__chevron');
  let maleNames = '';
  let offset = 10; // отступ при раскрытии аккордиона

  await getNames('Male');

  if (localStorage.getItem('names')) {
    maleNames = JSON.parse(localStorage.getItem('names'));
  }

  let randomName = () => {
    let randomNum = randomInt(1, maleNames.length);

    randName.innerText = maleNames[randomNum].name;
  };

  anotherMaleName.addEventListener('click', randomName);

  originName.addEventListener('click', () => {
    const isActive = accordionItem.classList.contains('active'); // проверка активен ли айтем

    orirginTale.classList.toggle('active');
    chevron.classList.toggle('active');
  });
});
