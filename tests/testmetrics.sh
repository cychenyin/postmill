#!/bin/bash
# while true; do curl http://serverapi:8888/account/summary; echo ''; done;
# /Users/MLS/workspace/git/pandora/modules/mob

root='/Users/MLS/workspace/git/pandora/modules/mob'

while true;
do 
    for f in `ls "$root"`
    do 
        #echo $f
    
        for p in `ls "$root/$f"`
        do
            #echo $p
            #echo ${p: -10}
            if [[ ${p: -10} = ".class.php"  ]]
            then
                s=${p:0:((${#p}-10))}
                s=`tr '[A-Z]' '[a-z]' <<<"$s"`
                f=`tr '[A-Z]' '[a-z]' <<<"$f"`
                #echo $s
                echo "curl http://serverapi:8888/$f/$s"
                curl "http://serverapi:8888/$f/$s" 2>&1
            fi
        done 
    done # endof for ls root
done # end of while

















