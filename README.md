Doctors booking Platform

The purpose of this app is to enable patients to book appointments with a doctor; each patient must be able to pick a time independent of what others have picked.
Index.php - Shows the page where patients register for appointments
db.php - Shows the admin page where we see who has booked and can also book for some. (that why index.php was included)
redirect.php - Shows the success message for registeration.
redirect2.php - Shows when there is a clash in times picked.

<strong>The Logic</strong>

When a patient registers, the details get stored in the database, and the time's status get changed to zero, and it no longer displays for the next person who is registering.

But when two or more people registering at the same time, and they pick the same time. Depending on who has a faster connection to the database, only one should be logged in the database and the other two should be redirect to an error message telling them to register again and pick another time. Hence the purpose of [redirect2.php].
