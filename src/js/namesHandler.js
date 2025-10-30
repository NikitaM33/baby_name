// Парсит имена из LocalStorage и возвращает их
export let getNamesFromStorage = () => {
  let nameArr = [];

  if (localStorage.getItem('names')) {
    nameArr = JSON.parse(localStorage.getItem('names'));
  }

  return nameArr;
};

// Открывает и закрывает аккордион с происхождением имени
export let toggleOriginAccordion = (originName, orirginTale, chevron) => {
  originName.addEventListener('click', () => {
    orirginTale.classList.toggle('active');
    chevron.classList.toggle('active');
  });
};
