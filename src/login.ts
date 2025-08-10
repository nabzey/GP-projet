const form = document.getElementById("loginForm") as HTMLFormElement;
const messageElement = document.getElementById("message") as HTMLParagraphElement;

form.addEventListener("submit", async (e) => {
    e.preventDefault();

    const username = (document.getElementById("username") as HTMLInputElement).value;
    const password = (document.getElementById("password") as HTMLInputElement).value;

    console.log("Tentative de connexion:", username);

    try {
        // Récupérer tous les utilisateurs depuis json-server
        console.log("Appel API...");
        const response = await fetch(`http://localhost:3001/users`);
        
        if (!response.ok) {
            throw new Error(`Erreur HTTP: ${response.status}`);
        }
        
        const users = await response.json();
        console.log("Données reçues:", users);
        const user = users.find((u: any) => u.username === username && u.password === password);
        console.log("Utilisateur trouvé:", user);

        if (user) {
            messageElement.textContent = "✅ Connexion réussie";
            messageElement.style.color = "green";
            localStorage.setItem("user", JSON.stringify(user));
            
            // Rediriger vers le dashboard
            setTimeout(() => {
                window.location.href = "/dashboard";
            }, 1000);
        } else {
            messageElement.textContent = "❌ Email ou mot de passe incorrect";
            messageElement.style.color = "red";
        }
    } catch (error) {
        console.error("Erreur :", error);
        messageElement.textContent = "⚠️ Problème de connexion au serveur";
        messageElement.style.color = "orange";
    }
});
