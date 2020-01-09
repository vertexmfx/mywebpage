select usrname from doe.usrinfo where groupname='jiangke'
and usrname not in(select distinct rankedname from doe.ranks where rankername='孟繁新');