"use strict";
const form = document.querySelector("#loginForm"); // Changé de #login-form à #loginForm
form === null || form === void 0 ? void 0 : form.addEventListener("submit", async (e) => {
    var _a, _b;
    e.preventDefault();
    const username = (((_a = document.querySelector("#username")) === null || _a === void 0 ? void 0 : _a.value) || "").trim();
    const password = (((_b = document.querySelector("#password")) === null || _b === void 0 ? void 0 : _b.value) || "").trim();
    // Afficher un message de chargement
    const messageDiv = document.querySelector("#message");
    if (messageDiv) {
        messageDiv.innerHTML = '<span class="text-blue-300">Connexion en cours...</span>';
    }
    try {
        // Appel vers ton JSON Server
        const response = await fetch("http://localhost:3000/users");
        // Vérifier si la réponse est OK
        if (!response.ok) {
            throw new Error(`Erreur HTTP: ${response.status}`);
        }
        const users = await response.json();
        // Vérification si l'utilisateur existe
        const userFound = users.find((u) => u.username === username && u.password === password);
        if (userFound) {
            // Succès - afficher message et rediriger
            if (messageDiv) {
                messageDiv.innerHTML = '<span class="text-green-300">✅ Connexion réussie !</span>';
            }
            // Redirection après un court délai
            setTimeout(() => {
                window.location.href = "dashboard";
            }, 1000);
        }
        else {
            // Échec de la connexion
            if (messageDiv) {
                messageDiv.innerHTML = '<span class="text-red-300">❌ Nom d\'utilisateur ou mot de passe incorrect !</span>';
            }
        }
    }
    catch (error) {
        console.error('Erreur lors de la connexion:', error);
        // Afficher un message d'erreur plus détaillé
        if (messageDiv) {
            messageDiv.innerHTML = '<span class="text-red-300">❌ Erreur de connexion au serveur. Vérifiez que JSON Server est démarré.</span>';
        }
    }
});
