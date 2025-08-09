const form = document.querySelector<HTMLFormElement>("#login-form");

form?.addEventListener("submit", async (e) => {
    e.preventDefault();

    const username = (document.querySelector<HTMLInputElement>("#username")?.value || "").trim();
    const password = (document.querySelector<HTMLInputElement>("#password")?.value || "").trim();

    // Appel vers ton JSON Server
    const response = await fetch("http://localhost:3000/users");
    const users = await response.json();

    // Vérification si l'utilisateur existe
    const userFound = users.find((u: any) => u.username === username && u.password === password);

    if (userFound) {
        alert("Connexion réussie !");
        window.location.href = "dashboard.php";
    } else {
        alert("Nom d'utilisateur ou mot de passe incorrect !");
    }
});
