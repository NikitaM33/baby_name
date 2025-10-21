import { getNames, randomInt, getOrigin } from './randomName.js';

window.addEventListener('load', async function () {
  let anotherMaleName = document.querySelector('#anotherMaleName');
  let randName = document.querySelector('.random-name__name');
  let originName = document.querySelector('.origin-name');
  let accordionText = document.querySelector('.origin-tale__text');
  // let accordionItem = document.querySelector('.origin__accordion-item');
  let orirginTale = document.querySelector('.origin-tale');
  let chevron = document.querySelector('.origin-name__chevron');
  let maleNames = [];
  let currentName = '';

  await getNames('Male');

  // Берет из локалсторидж имена
  if (localStorage.getItem('names')) {
    maleNames = JSON.parse(localStorage.getItem('names'));
  }

  // Подставляет рандомное имя
  let randomName = () => {
    let randomNum = randomInt(0, maleNames.length);

    currentName = maleNames[randomNum].name;
    randName.innerText = currentName;

    getOrigin(currentName);
  };

  // Обновляет имя
  anotherMaleName.addEventListener('click', randomName);

  // Запрос на историю имени
  originName.addEventListener('click', () => {
    // const isActive = orirginTale.classList.contains('active'); // проверка активен ли айтем

    orirginTale.classList.toggle('active');
    chevron.classList.toggle('active');
  });
});
