
/*
------------------------------------------------------------------------
------------------------------REQUETE-----------------------------------
------------------------------------------------------------------------
*/
/* Requete dont on aura besoin */
/* liste des coachs */
select prenom, nom
from Coach;

/* Liste des adherents et leurs informations */
select prenom, nom, age, poids, taille
from Adherant 
where email = 'exemple@example.expl';

/* liste des coaching d'un coach voir avec la vue plus haut jai un doute */
select prenom_coach nom_coach N.date_coaching S.date_coaching
from Coaching_nutrition N, Coaching_sportif S
where N.nom_coach = 'exemple' or S.nom_coach = 'exemple';

/* avis moyen des coach sur leur coaching sportif */
select CH.nom_coach, CH.prenom_coach, avg(Coaching_sportif.avis) as avis_sportif_moyen
from Coaching_sportif S, Coach CH
where S.numero_coach = CH.numero
group by CH.numero;

/* avis moyen des coach sur leur coaching nutrition */
select CH.nom_coach, CH.prenom_coach, avg(Coaching_nutrition.avis) as avis_nutrition_moyen
from Coaching_nutrition N, Coach CH
where N.numero_coach = CH.numero
group by CH.numero;

# requete qui affiche limc de chaque adherant et son etat 
select   A.prenom , A.nom, A.age, Imc.imc,

 (case 
 when 25> imc.imc >18  then 'corpulence normale'
 when 30> imc.imc >25  then 'surpoids'
 when  	  imc.imc >30 	 then 'obésité'
 else 'maigreur'
 end ) as etat
 from Adherant A , imc   
 where( A.poids  = imc.poids  and   A.taille = imc.taille);

# ici met une requte qui somme les deux vues et qui affiche les nombre 
# total de coaching de chaque coach ainsi que leurs note (avis) general
select numero_coach, avis_coach
from classement_coach
where numero_coach = 'numeroducoach';
 

/* Reduction sur le prix pour les adherents a partir de l'achat de leur
3eme programme */

update Programme : 
update Programme set prix = prix * 0.85 
where id in (	select id_Programme, count(email_adherent)
				from Pratique
				where Programme.id = Pratique.id_programme
				group by email_adherent
				having count(email_adherent) > 2
			);

				







