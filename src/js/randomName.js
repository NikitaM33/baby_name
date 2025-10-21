let randName = document.querySelector('.random-name__name');
let accordionText = document.querySelector('.origin-tale__text');

let names = [];
let currentName = '';

export let randomInt = (min, max) => {
  return Math.floor(Math.random() * (max - min)) + min;
};

export let getNames = async (gender) => {
  try {
    let response = await fetch(`/src/helpers/api${gender}.php`);
    names = await response.json();

    if (response.ok) {
      let randomNum = randomInt(0, names.length);

      currentName = names[randomNum].name;
      randName.innerText = currentName;

      localStorage.removeItem('names');
      localStorage.setItem('names', JSON.stringify(names));

      getOrigin(currentName);
    }
  } catch (error) {
    console.error('Не удалось получить список имен. ', error);
  }
};

export let getOrigin = async (name) => {
  names.forEach((elem) => {
    if (elem.name == name) {
      accordionText.innerText = elem.origin;
    }
  });
};
