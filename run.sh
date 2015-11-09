#!/bin/bash -e

COMMAND=${1:-serve}

case $COMMAND in
    serve)
        exec supervisord -n
        ;;

    bash)
        shift
        exec bash "$@"
        ;;
esac
