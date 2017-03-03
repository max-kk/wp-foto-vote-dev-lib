# If you want verify votes count

SELECT vote_id, COUNT(id) as votes_total 
FROM `wp_fv_votes`
GROUP BY `vote_id`
ORDER BY  `votes_total` DESC;

# Result: competitor ID : votes
# Note: please reapce "wp_" to your prefix