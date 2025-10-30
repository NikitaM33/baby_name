import { getNames, randomInt, getOrigin } from './randomName.js';
import { getNamesFromStorage, toggleOriginAccordion } from './namesHandler.js';

window.addEventListener('load', async function () {
  let anotherFemaleName = document.querySelector('#anotherFemaleName');
  let randName = document.querySelector('.random-name__name');
  let originName = document.querySelector('.origin-name');
  let orirginTale = document.querySelector('.origin-tale');
  let chevron = document.querySelector('.origin-name__chevron');
  let femaleNames = [];
  let currentName = '';

  // Запрос в БД женских имен
  await getNames('Female');

  // Берет из локалсторидж имена
  femaleNames = getNamesFromStorage();

  // Подставляет рандомное имя
  let randomName = () => {
    let randomNum = randomInt(0, femaleNames.length);

    currentName = femaleNames[randomNum].name;
    randName.innerText = currentName;

    getOrigin(currentName);
  };

  // Обновляет имя
  anotherFemaleName.addEventListener('click', randomName);

  // Toggle на историю имени
  toggleOriginAccordion(originName, orirginTale, chevron);

});
