./phan.phar --allow-polyfill-parser > phan.out
cat phan.out | sed G | sed -E 's|([a-zA-Z0-9 _\./\-]+:[[:digit:]]+)|'"$(pwd)"'/\1\
|g' | fold -sw 150
num_matches=$(cat phan.out | wc -l | xargs);
if [ -s phan.out ]; then
        echo "There are ${num_matches} errors";
else
        echo "No errors";
fi
rm phan.out
