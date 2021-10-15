# Goal
Ons doel is om een eLearning platform te maken:
 - Gebruikers zullen hun eigen lessen kunnen posten en andere lessen kunnen volgen. Een les kan in de vorm van een post enkel met tekst en afbeeldingen of ook met een video.
 - Mensen die niet ingeschreven zijn kunnen de lessen zien maar kunnen daar niet op reageren en hun eigen lessen niet posten.

# Acceptance criteria
how do we know that the goals have been reached?
 - Vanaf het moment dat mensen kunnen leren door lessen te volgen van andere users, op lessen kunnen reageren en hun eigen lessen kunnen posten.
Ons doel is om een eLearning platform te maken:
 - Gebruikers zullen hun eigen lessen kunnen posten en andere lessen kunnen volgen. Een les kan in de vorm van een post enkel met tekst en afbeeldingen of ook met een video. Een les kan je ook in de vorm van een thread hebben, wat zeer handig is voor mensen die een bepaald onderwerp willen leren vanaf 0. 
 - De reactie/comment functionaliteit zal de studenten de mogelijkheid geven om vragen te stellen en die vragen kunnen door elk gebruiker die een account heeft beantwoord worden.
 - Mensen die niet ingeschreven zijn kunnen de lessen zien maar kunnen daar niet op reageren en hun eigen lessen niet posten.

# Threat model
*describe your threat model. One or more architectural diagram expected. Also a list of the principal threats and what you will do about them*

-	Injecties: Veilige APIs gebruiken, whitelist server-side input validation (voor speciale karakters) en LIMIT gebruiken voor SQL.

-	Vulnerable and Outdated Components: We gaan de bronnen van wat we gebruiken goed na checken en elke keer de stabielste en laatste versie proberen te gebruiken

-	Broken access control : user account permissions controleren voordat ze aan data kunnen.

-	Sercurity logging failures : encoded logging of all important user actions

- Software and Data Integrity Failures: 

- Cross site request forgery: 



# Deployment
*minimally, this section contains a public URL of the app. A description of how your software is deployed is a bonus. Do you do this manually, or did you manage to automate? Have you taken into account the security of your deployment process?*
# *you may want further sections*
*especially if the use of your application is not self-evident*
