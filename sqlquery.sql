select concat(u.firstname, " ", u.lastname) as name, AVG(score) as mean_score, year from user_scores us inner join users u on u.id=us.user_id group by us.year, name order by mean_score desc;
