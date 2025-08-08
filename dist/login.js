"use strict";
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
const form = document.getElementById("loginForm");
const messageElement = document.getElementById("message");
form.addEventListener("submit", (e) => __awaiter(void 0, void 0, void 0, function* () {
    e.preventDefault();
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    try {
        const response = yield fetch(`http://localhost:3000/users?username=${username}&password=${password}`);
        const users = yield response.json();
        if (users.length > 0) {
            messageElement.textContent = "✅ Connexion réussie";
            messageElement.style.color = "green";
            localStorage.setItem("user", JSON.stringify(users[0]));
            window.location.href = "/dashboard.html";
        }
        else {
            messageElement.textContent = "❌ Nom d'utilisateur ou mot de passe incorrect";
            messageElement.style.color = "red";
        }
    }
    catch (error) {
        console.error("Erreur :", error);
        messageElement.textContent = "⚠️ Problème de connexion au serveur";
        messageElement.style.color = "orange";
    }
}));
