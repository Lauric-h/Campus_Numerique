- Page avec formulaire
    - champ nom d'utilisateur
    - bouton
=> Formulaire doit être validé et n'accepte pas les pseudos de -3 carac ni msg -10 carac
- un fichier message => table
- La page doit afficher les messages :
    <p>
        <strong>Pseudo</strong> <em>le 03/11/2018 à 12h00</em><br>
    </p>
- Restrictions :
    - Utiliser une classe pour représenter un message
        - new Message (string $username, string message, DateTime $date = null)
        - isValid(): bool -> si le message et/ou pseudo sont valides
        - getErrors(): array -> tableau contenant les erreurs, indexé par le nom du champ (username, message)
        - toHTML(): string > convertit le message en html
        - toJSON(): string - à voir
    - Utiliser une classe pour représenter le livre d'or 
        - new Guestbook($fichier)
        - addMessage(Message $message)
        - getMessages(): array

***
## To do
- Form / HTML
- Créer BDD
- Connexion à la BDD avec PDO
-