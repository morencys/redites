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
        private MySqlDatabase MySqlDatabase { get; set; }
  
        private async Task<List<dto.Post>> GetPosts() 
        {
            var ret = new List<dto.Post>();

            var cmd = this.MySqlDatabase.Connection.CreateCommand() as MySqlCommand;
            cmd.CommandText = @"SELECT postId, postTitle, postText FROM tblpost";
            

            using (var reader = await cmd.ExecuteReaderAsync())
            while (await reader.ReadAsync())
            {
                var t = new dto.Post()
                {
                    PostId = reader.GetFieldValue<int>(0),
                    PostTitle = reader.GetFieldValue<string>(1),
                    PostText = reader.GetFieldValue<string>(2)
                };

                var topics = new dto.Topic()
                {

                };


                ret.Add(t);
            }
            return ret;
        }


        private async Task<List<dto.Topic>> GetTopics()
        {
            var ret = new List<dto.Topic>();
            var cmd = this.MySqlDatabase.Connection.CreateCommand() as MySqlCommand;

            cmd.CommandText = @"SELECT topicName FROM tbltopic";

            using (var reader = await cmd.ExecuteReaderAsync())
                while (await reader.ReadAsync())
                {
                    var topics = new dto.Topic()
                    {
                        TopicId = reader.GetFieldValue<int>(0),
                        TopicName = reader.GetFieldValue<string>(1),
                    };


                    ret.Add(topics);
                }

            return ret;
        }

        private async Task<List<dto.Comment>> GetComments()
        {
            var ret = new List<dto.Comment>();

            var cmd = this.MySqlDatabase.Connection.CreateCommand() as MySqlCommand;
            cmd.CommandText = @"SELECT CommentId, CommentUserId, CommentText FROM tblcomment";

            using (var reader = await cmd.ExecuteReaderAsync())
                while (await reader.ReadAsync())
                {
                    var t = new dto.Comment()
                    {
                        CommentId = reader.GetFieldValue<int>(0),
                        CommentUserId = reader.GetFieldValue<int>(1),
                        CommentText = reader.GetFieldValue<string>(2)
                    };


                    ret.Add(t);
                }

            return ret;
        }

        private readonly ILogger<HomeController> _logger;

        public HomeController(ILogger<HomeController> logger, MySqlDatabase mySqlDatabase)
        {
            _logger = logger;
            this.MySqlDatabase = mySqlDatabase;

        }

        public async Task<IActionResult> IndexAsync()
        {
            return View(await GetPosts());
        }
        public IActionResult Privacy()
        {
            return View();
        }

        [ResponseCache(Duration = 0, Location = ResponseCacheLocation.None, NoStore = true)]
        public IActionResult Error()
        {
            return View(new ErrorViewModel { RequestId = Activity.Current?.Id ?? HttpContext.TraceIdentifier });
        }
    }
}
