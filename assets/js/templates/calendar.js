const eventToggles = document.querySelectorAll(".event.special .event-header")
    
console.log(eventToggles)

for (const eventToggle of eventToggles) {
    eventToggle.addEventListener('click', function(event) {
        eventToggle.closest('li').classList.toggle('show')
  })
}
