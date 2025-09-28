let randName = document.querySelector('.random-name__name');

export let randomInt = (min, max) => {
  return Math.floor(Math.random() * (max - min)) + min;
};

export let getNames = async (gender) => {
  try {
    let response = await fetch(`/src/helpers/api${gender}.php`);
    let names = await response.json();

    if (response.ok) {
      let randomNum = randomInt(1, names.length)

      randName.innerText = names[randomNum].name;
      localStorage.removeItem('names');
      localStorage.setItem('names', JSON.stringify(names));
    }
  } catch (error) {
    console.error('Не удалось получить получить список имен. ', error);
  }
};
