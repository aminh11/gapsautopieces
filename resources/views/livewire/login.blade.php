<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register Form</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">

  <style>
    body {
      margin: 0;
      padding: 0;
      font: 1em/1.618 'Nunito', sans-serif;
      background: #191d26 url(https://sdmntprsouthcentralus.oaiusercontent.com/files/00000000-d954-61f7-8a12-9eb2c29ad7a4/raw?se=2025-04-10T15%3A22%3A43Z&sp=r&sv=2024-08-04&sr=b&scid=914c1a42-d345-56b5-a4b6-f04668316d20&skoid=cbbaa726-4a2e-4147-932c-56e6e553f073&sktid=a48cca56-e6da-484e-a814-9c849652bcb3&skt=2025-04-09T21%3A53%3A39Z&ske=2025-04-10T21%3A53%3A39Z&sks=b&skv=2024-08-04&sig=ZoWnqg9dQwwfdtfDbR6NbXk8dByr7QQ/BBcJlnx22TM%3D) center / cover no-repeat fixed;
      color: #1A2421;
    }

    body::before {
      content: "";
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.5);
      z-index: -1;
    }

    .form-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .signup-form {
      max-width: 400px;
      width: 100%;
      padding: 30px;
      border-radius: 16px;
      background: linear-gradient(to bottom, rgba(255,255,255,0.6), rgba(255,255,255,0.3));
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255,255,255,0.3);
      box-shadow: 0 0 20px rgba(0,0,0,0.7);
      animation: fade-in-up 0.8s ease-out;
    }

    .signup-form h1, .signup-form h3, .signup-form p {
      text-align: center;
    }

    label {
      position: relative;
      display: block;
      margin-bottom: 20px;
    }

    label svg {
      position: absolute;
      top: 50%;
      left: 10px;
      transform: translateY(-50%);
      width: 20px;
      height: 20px;
      color: rgba(0,0,0,0.5);
    }

    input {
      width: 100%;
      padding: 10px 10px 10px 40px;
      border-radius: 8px;
      border: none;
      background: rgba(0,0,0,0.2);
      color: #333;
      outline: none;
    }

    button {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 8px;
      background: #191d26;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background: #0c1019;
    }

    @keyframes fade-in-up {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

  </style>
</head>

<body>

<div class="form-wrapper">
  <form class="signup-form">
    <h3>Signup required!</h3>
    <h1>Register for free</h1>
    <p>Enter a valid email & password below to get started.</p>

    <label for="email">
      <svg viewBox="0 0 24 24" fill="currentColor">
        <path d="M0 0h24v24H0V0z" fill="none"/>
        <path d="M12 1.95c-5.52 0-10 4.48-10 10s4.48 10 10 10h5v-2h-5c-4.34 0-8-3.66-8-8s3.66-8 8-8 8 3.66 8 8v1.43c0 .79-.71 1.57-1.5 1.57s-1.5-.78-1.5-1.57v-1.43c0-2.76-2.24-5-5-5z"/>
      </svg>
      <input type="email" name="email" id="email" placeholder="Email">
    </label>

    <label for="password">
      <svg viewBox="0 0 24 24" fill="currentColor">
        <path d="M0 0h24v24H0V0z" fill="none"/>
        <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 11c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/>
      </svg>
      <input type="password" name="password" id="password" placeholder="Password">
    </label>

    <button type="submit">Continue</button>
  </form>
</div>

</body>
</html>
