<template>
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">

       <router-link to="/"  class="navbar-item">
        <h3>Phonebook With Laravel and vue</h3>
      </router-link>

 <router-link to="/home"  class="navbar-item">Home</router-link>
 <router-link to="/about"  class="navbar-item">About</router-link>
    <router-link to="/contact"  class="navbar-item">Contact</router-link>
    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
    
  </div>
</nav>
</template>