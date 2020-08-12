function addUser(mode, { name, birth, rg, cpf, phone, course, year, expedient }) {
  if (mode == 0) return;
  query("#name").value = name;
  query("#birth").value = birth;
  query("#rg").value = rg;
  query("#cpf").value = cpf;
  query("#phone").value = phone;
  query("#course").value = course;
  query("#year").value = year;
  query("#expedient").value = expedient;
}

const fullName =
  getOneInArray(data.name, "first") + " " +
  getOneInArray(data.name, "middle") + " " +
  getOneInArray(data.name, "last")

addUser(1, {
  name: fullName,
  birth: "2020-03-12",
  rg: getRandomNumberBetwen(1, 999999999),
  cpf: getRandomNumberBetwen(1, 99999999999),
  phone: "9" + getRandomNumber(0, 99999) + getRandomNumber(0, 9999),
  course: getOneInArray(data, "course"),
  year: getOneInArray(data, "year"),
  expedient: getOneInArray(data, "expedient")
});
