using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;
using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Threading.Tasks;
using WebApplication1.Models;
using MySql.Data.MySqlClient;
using dto = WebApplication1.Models;

namespace WebApplication1.Controllers
{

    public class HomeController : Controller
    {
        
        private readonly ILogger<HomeController> _logger;

        public HomeController(ILogger<HomeController> logger)
        {
            _logger = logger;
        }

        
        public async Task<IActionResult> IndexAsync()
        {
            //return View(await GetSites());
            return View();
        }
        
        public IActionResult Privacy()
        {
            return View();
        }

        public async Task<IActionResult> Login()
        {
            return View(await GetUsers());
        }

        [ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
        public IActionResult Error()
        {
            return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
        }
    }
}
