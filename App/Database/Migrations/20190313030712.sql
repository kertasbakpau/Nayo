CREATE OR REPLACE PROCEDURE `sp_profitlostcost`(
	IN StartDate DATETIME,
    IN EndDate DATETIME
)
	SELECT  a.`Code`, 
		a.`Name`, 
		a.Default,
		CASE WHEN a.Default = 'D' THEN SUM(b.`Debet`) - SUM(b.`Credit`)
			ELSE SUM(b.`Credit`) - SUM(b.`Debet`)
		END Amount
	FROM m_chartofaccounts a 
	INNER JOIN t_journaldetails b ON b.`M_Chartofaccount_Id` = a.`Id`
	INNER JOIN t_journals c ON c.Id = b.`T_Journal_Id`
	WHERE a.CodeInt >= 4000000000 AND a.`CodeInt` < 5000000000
		AND c.TranDate >= StartDate AND c.TranDate <= EndDate
	GROUP BY a.`Code`, 
		a.`Name`, 
		a.Default;
