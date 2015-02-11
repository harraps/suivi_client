# suivit_de_clientelle (pour le 9 mars 2015)
Projet d'application web de suivit de clientelle (cours IHM - intervenant)

<table>
<tr> <th>User</th> <th>Project</th> <th>User_Project</th> <th>Communication</th> </tr>
<tr>
 <td>
 - id
 - name
 - firstname
 - email
 - entity
 - address
 - phone
 </td>
 <td>
 - id
 - name
 </td>
 <td>
 - id_user
 - id_project
 </td>
 <td>
 - id
 - title
 - content
 - id_author
 - date
 - id_project
 </td>
</tr>
</table>

le site doit permettre pour chaque USER/PROJECT/ASK (utilisateur, projet, demande)
de pouvoir CREATE/UPDATE/DELETE

le login se fait par email
il faut un logout

les vues sont :
- login
- list user + form
- list projects + form
- list asks + form

Il faut un script de tests Unitaires
