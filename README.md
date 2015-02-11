# suivit_de_clientelle (pour le 9 mars 2015)
Projet d'application web de suivit de clientelle (cours IHM - intervenant)

<table>
<tr> <th>User</th> <th>Project</th> <th>User_Project</th> <th>Communication</th> </tr>
<tr>
 <td><ul>
 <li>id</li>
 <li>name</li>
 <li>firstname</li>
 <li>email</li>
 <li>entity</li>
 <li>address</li>
 <li>phone</li>
 </ul></td>
 <td><ul>
 <li>id</li>
 <li>name</li>
 </ul></td>
 <td><ul>
 <li>id_user</li>
 <li>id_project</li>
 </ul></td>
 <td><ul>
 <li>id</li>
 <li>title</li>
 <li>content</li>
 <li>id_author</li>
 <li>date</li>
 <li>id_project</li>
 </ul></td>
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
