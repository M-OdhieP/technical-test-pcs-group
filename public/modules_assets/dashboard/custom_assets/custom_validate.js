$('#create-form').validate({
  rules: {
    name: {
      required: true,
      minlength: 2,
    },
    description: {
      required: true,
    },
    price: {
      required: true,
    },
    image: {
      required: true,
      extension: 'jpg|jpeg|png|gif',
    },
  },
  messages: {
    name: {
      required: 'Please enter your name',
      minlength: 'Your name must be at least 2 characters long',
    },
    description: {
      required: 'Please enter your email address',
    },
    price: {
      required: 'Please enter a message',
    },
    image: {
      required: 'Please select an image to upload',
      extension: 'Only JPG, JPEG, PNG, and GIF images are allowed',
    },
  },
})
$('#edit-form').validate({
  rules: {
    name: {
      required: true,
      minlength: 2,
    },
    email: {
      required: true,
      email: true,
    },
    message: {
      required: true,
      minlength: 10,
    },
    image: {
      extension: 'jpg|jpeg|png|gif',
    },
  },
  messages: {
    name: {
      required: 'Please enter your name',
      minlength: 'Your name must be at least 2 characters long',
    },
    email: {
      required: 'Please enter your email address',
      email: 'Please enter a valid email address',
    },
    message: {
      required: 'Please enter a message',
      minlength: 'Your message must be at least 10 characters long',
    },
    image: {
      extension: 'Only JPG, JPEG, PNG, and GIF images are allowed',
    },
  },
})
