    
     let count = 0;
     let t;
     let timer_is_on = 0;

     function timedCount() {
     document.getElementById("txt").value = count;
     count = count + 1;
     t = setTimeout(timedCount, 1000);
     }


     function startCount() {
        if (!timer_is_on) {
          timer_is_on = 1;
          timedCount();
        }
      }
      
      function stopCount() {
        clearTimeout(t);
        timer_is_on = 0;
      }
