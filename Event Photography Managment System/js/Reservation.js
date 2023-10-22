const form = document.getElementById('form');
const firstname = document.getElementById('firstname');
const lastname = document.getElementById('lastname');
const email_address = document.getElementById('email_address');
const phone_number = document.getElementById('phone_number');
const date = document.getElementById('date');
const address = document.getElementById('address');
form.addEventListener('submit', (e) => {
  e.preventDefault();

  validateInputs();
});

const setError = (element, message, id) => {
  //   const inputControl = element.parentElement.parentElement;
  const errorDisplay = document.getElementById(id);

  console.log(id);

  errorDisplay.innerText = message;
  //   errorDisplay.hidden = false;
  errorDisplay.classList.add('error');
  errorDisplay.classList.remove('success');
};

const setSuccess = (element, id) => {
  //   const inputControl = element.parentElement;
  const errorDisplay = document.getElementById(id);

  errorDisplay.innerText = '';
  //   errorDisplay.hidden = true;

  //   inputControl.classList.add('success');
  errorDisplay.classList.remove('error');
};

const isValidEmail = (email) => {
  const re =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
};

const validateInputs = () => {
  const firstnameValue = firstname.value.trim();
  const lastnameValue = lastname.value.trim();
  const email_addressValue = email_address.value.trim();
  const phone_numberValue = phone_number.value.trim();
  const dateValue = date.value.trim();
  const addressValue = address.value.trim();

  if (firstnameValue === '') {
    setError(firstname, 'First Name is required', 'firstname-error');
  } else {
    setSuccess(firstname, 'firstname-error');
  }

  if (lastnameValue === '') {
    setError(lastname, 'Last Name is required', 'lastname-error');
  } else {
    setSuccess(lastname, 'lastname-error');
  }

  if (email_addressValue === '') {
    setError(email_address, 'Email is required', 'email_address-error');
  } else if (!isValidEmail(email_addressValue)) {
    setError(
      email_address,
      'Provide a valid email address',
      'email_address-error'
    );
  } else {
    setSuccess(email_address, 'email_address-error');
  }

  if (phone_numberValue === '') {
    setError(phone_number, 'Phone Number is required', 'phone_number-error');
  } else if (phone_numberValue.length < 10) {
    setError(
      phone_number,
      'Phone NUmber must be at least 10 characters.',
      'phone_number-error'
    );
  } else {
    setSuccess(phone_number, 'phone_number-error');
  }

  if (dateValue === '') {
    setError(date, 'Date is required', 'date-error');
  } else {
    setSuccess(date, 'date-error');
  }

  if (addressValue === '') {
    setError(address, 'Address is required', 'address-error');
  } else {
    setSuccess(address, 'address-error');
  }
};
