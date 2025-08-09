"use strict";
const form = document.querySelector("#login-form");
form === null || form === void 0 ? void 0 : form.addEventListener("submit", async (e) => {
    var _a, _b;
    e.preventDefault();
    const username = (((_a = document.querySelector("#username")) === null || _a === void 0 ? void 0 : _a.value) || "").trim();
    const password = (((_b = document.querySelector("#password")) === null || _b === void 0 ? void 0 : _b.value) || "").trim();
    // Appel vers ton JSON Server
    const response = await fetch("http://localhost:3000/users");
    const users = await response.json();
    // Vérification si l'utilisateur existe
    const userFound = users.find((u) => u.username === username && u.password === password);
    if (userFound) {
        alert("Connexion réussie !");
        window.location.href = "dashboard.php";
    }
    else {
        alert("Nom d'utilisateur ou mot de passe incorrect !");
    }
});
