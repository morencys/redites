﻿using Microsoft.AspNetCore.Mvc;
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
  
        private async Task<Site> GetSites() 
        {
            var ret = new List<dto.Post>();
            var comments = new List<dto.Comment>();
            var listTopics = new List<dto.Topic>();

            var cmd = this.MySqlDatabase.Connection.CreateCommand() as MySqlCommand;
            cmd.CommandText = @"SELECT postId, postTitle, postText, PostTopicId FROM tblpost";
            

            using (var reader = await cmd.ExecuteReaderAsync())
            while (await reader.ReadAsync())
            {
                    var t = new dto.Post()
                    {
                        PostId = reader.GetFieldValue<int>(0),
                        PostTitle = reader.GetFieldValue<string>(1),
                        PostText = reader.GetFieldValue<string>(2),
                        PostTopicId = reader.GetFieldValue<int>(3),
                    };

                ret.Add(t);
            }
            cmd.CommandText = @"SELECT CommentId, CommentUserId, CommentPostId, CommentText FROM tblcomment";

            using (var reader = await cmd.ExecuteReaderAsync())
                while (await reader.ReadAsync())
                {
                    var t = new dto.Comment()
                    {
                        CommentId = reader.GetFieldValue<int>(0),
                        CommentUserId = reader.GetFieldValue<int>(1),
                        CommentPostId = reader.GetFieldValue<int>(2),
                        CommentText = reader.GetFieldValue<string>(3)
                    };

                    comments.Add(t);
                }
            cmd.CommandText = @"SELECT topicId, topicName FROM tbltopic";

            using (var reader = await cmd.ExecuteReaderAsync())
                while (await reader.ReadAsync())
                {
                    var topics = new dto.Topic()
                    {
                        TopicId = reader.GetFieldValue<int>(0),
                        TopicName = reader.GetFieldValue<string>(1),
                    };


                    listTopics.Add(topics);
                }

            Site site = new Site()
            {
                post = ret,
                comment = comments,
                topic = listTopics

            };

            return site;
        }


        /*private async Task<List<dto.Topic>> GetTopics()
        {
            var listTopics = new List<dto.Topic>();
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


                    listTopics.Add(topics);
                }

            return listTopics;
        }*/

       /* private async Task<List<dto.Comment>> GetComments()
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
        }*/

        private readonly ILogger<HomeController> _logger;

        public HomeController(ILogger<HomeController> logger, MySqlDatabase mySqlDatabase)
        {
            _logger = logger;
            this.MySqlDatabase = mySqlDatabase;

        }


        public async Task<IActionResult> IndexAsync()
        {
            return View(await GetSites());
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
