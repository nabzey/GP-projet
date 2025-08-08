const form = document.getElementById("loginForm") as HTMLFormElement;
const messageElement = document.getElementById("message") as HTMLParagraphElement;

form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const username = (document.getElementById("username") as HTMLInputElement).value;
    const password = (document.getElementById("password") as HTMLInputElement).value;

    try {
        const response = await fetch(`http://localhost:3000/users?username=${username}&password=${password}`);
        const users = await response.json();

        if (users.length > 0) {
            messageElement.textContent = "✅ Connexion réussie";
            messageElement.style.color = "green";
            localStorage.setItem("user", JSON.stringify(users[0]));
            window.location.href = "/dashboard.html";
        } else {
            messageElement.textContent = "❌ Nom d'utilisateur ou mot de passe incorrect";
            messageElement.style.color = "red";
        }
    } catch (error) {
        console.error("Erreur :", error);
        messageElement.textContent = "⚠️ Problème de connexion au serveur";
        messageElement.style.color = "orange";
    }
});
