const query = (selector) => document.querySelector(selector);

function getRandomNumber(min, size) {
  return Math.floor(Math.random() * size + min);
}

function getRandomNumberBetwen(min, max) {
  const size = max + 1 - min;
  return Math.floor(Math.random() * size + min);
}

function getOneInArray(array, name) {
  return array[name][getRandomNumber(0, array[name].length)];
}
