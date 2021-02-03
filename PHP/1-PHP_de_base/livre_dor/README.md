# Livre d'or 
Exercice de création d'un livre d'or avec les specs de la série de Grafikart sur le PHP.
[Lien de la série de Grafikart](https://www.youtube.com/watch?v=aXt6zrAj3lk)
Utilisation d'une BDD MySQL au lieu d'un fichier texte.

**=> Technos : PHP / MySQL**
***
## Specs
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
- Valider les données
- Formater l'heure et la date
- CSS
- Checker la correction Grafikart

***
