let randName = document.querySelector('.randName');

export let getNames = async (gender) => {
  try {
    let response = await fetch(`/src/helpers/api${gender}.php`);
    let names = await response.json();

    if (response.ok) {
      let randomNum = Math.floor(Math.random() * names.length) + 1;

      randName.innerText = names[randomNum].name;
      localStorage.removeItem('names');
      localStorage.setItem('names', JSON.stringify(names));
    }
  } catch (error) {
    console.error('Не удалось получить ответ от БД. ', error);
  }
};
