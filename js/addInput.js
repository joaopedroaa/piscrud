const data = {
  model: ["Y", "X", "J", "H", "S", "P", "3", "J"],
  brand: [
    "Honda",
    "Tesla",
    "Toyota",
    "BMW",
    "Volkswagen",
    "Mercedes-Benz",
    "Nissan",
    "Ford",
    "Porsche",
    "Hyundai",
    "Renault",
    "Peugeot",
    "Audi",
    "Chevrolet",
    "Kia",
    "Suzuki",
    "Fiat",
    "Daimler",
    "Land Rover",
    "Citroën",
    "Subaru",
  ],
  color: [
    "Cinza",
    "Prata",
    "Branco",
    "Preto",
    "Amarelo",
    "Vermelho",
    "Roxo",
    "Azul",
    "Verde",
    "Laranja",
  ],
};

const query = (id) => document.querySelector(id);

function addCars({ model, brand, price, year, color }) {
  query("#model").value = model;
  query("#brand").value = brand;
  query("#price").value = price;
  query("#year").value = year;
  query("#color").value = color;
}

function getRandomNumber(min, size) {
  return Math.floor(Math.random() * size + min);
}

function getRandomNumberBetwen(min, max) {
  const size = max + 1 - min;
  return Math.floor(Math.random() * size + min);
}

addCars({
  price: getRandomNumberBetwen(5000, 150000),
  year: getRandomNumberBetwen(1769, 2022),
  model: data.model[getRandomNumber(0, data.model.length)],
  brand: data.brand[getRandomNumber(0, data.brand.length)],
  color: data.color[getRandomNumber(0, data.color.length)],
});
