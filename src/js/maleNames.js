import {getNames} from './randomName.js';

window.addEventListener('load', async function () {
  let maleNames = await getNames('Male');

  console.log(maleNames);
});
