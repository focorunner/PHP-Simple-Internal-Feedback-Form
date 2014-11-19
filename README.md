PHP-Simple-Internal-Feedback-Form
=================================

Fairly simple feedback form using flat files

I created this as a quick solution to a very specific need. One requirement was that it not be overly complex, because it was to be deployed in an internal server environment without database access. My solution was to use csv files, which has the added benefit of avoiding sharing violations when the output files are read by using setting up a text data connection in Excel.
