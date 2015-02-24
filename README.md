# suivi_client (pour le 9 mars 2015)
Projet d'application web de suivit de clientelle (cours IHM - intervenant)
envoyer le projet par mail à coelho@henji.fr

<table>
<tr> <th>User</th> <th>Project</th> <th>UserProject</th> <th>Demand</th> <th>Comment</th> </tr>
<tr>

 <td><ul>
 <li>id</li>
 <li>entity</li>
 <li>first name</li>
 <li>last name</li>
 <li>email</li>
 <li>address</li>
 <li>phone</li>
 <li>password encrypted</li>
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
 <li>id_project</li>
 <li>date creation</li>
 <li>date wished</li>
 <li>date test</li>
 <li>date test validation</li>
 <li>date production</li>
 <li>date production validation</li>
 </ul></td>
 
 <td><ul>
 <li>id</li>
 <li>id_user</li>
 <li>id_demand</li>
 <li>content</li>
 <li>date</li>
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
